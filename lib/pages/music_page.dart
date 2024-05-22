import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:flutter/material.dart';
import 'package:audioplayers/audioplayers.dart';
import 'package:booking_hotel/models/song_model.dart';

class MusicPage extends StatefulWidget {
  final Playlist playlist;

  const MusicPage({Key? key, required this.playlist}) : super(key: key);

  @override
  State<MusicPage> createState() => _MusicPageState();
}

class _MusicPageState extends State<MusicPage> {
  late Playlist playlist;
  bool isPlaying = false;
  late final AudioPlayer player;
  late Duration _duration;
  late Duration _position;
  void initPlayer() {
    player = AudioPlayer()..setSourceAsset(playlist.audio);
    _duration = Duration();
    _position = Duration();

    player.onDurationChanged.listen((Duration d) {
      _duration = d;
      setState(() {});
    });
    player.onPositionChanged.listen((Duration p) {
      _position = p;
      setState(() {});
    });
    player.onPlayerComplete.listen((event) {
      setState(() {
        _position = _duration;
      });
    });
  }

  void playOrPause() {
    if (player.state == PlayerState.playing) {
      player.pause();
      isPlaying = false; // Cập nhật biến trạng thái local
    } else {
      player.resume();
      isPlaying = true; // Cập nhật biến trạng thái local
    }
    setState(() {}); // Cập nhật giao diện người dùng
  }

  void stopPlayer() {
    player.stop();
  }

  String formatDuration(Duration duration) {
    String twoDigits(int n) => n.toString().padLeft(2, "0");
    String twoDigitMinutes = twoDigits(duration.inMinutes.remainder(60));
    String twoDigitSeconds = twoDigits(duration.inSeconds.remainder(60));
    return "${twoDigits(duration.inHours)}:$twoDigitMinutes:$twoDigitSeconds";
  }

  @override
  void initState() {
    super.initState();
    playlist = widget.playlist;
    initPlayer();
    isPlaying = true;
  }

  @override
  void dispose() {
    player.release();
    player.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return WillPopScope(
      onWillPop: () async {
        // Dừng phát nhạc trước khi quay lại màn hình trước
        stopPlayer();
        return true;
      },
      child: Scaffold(
        backgroundColor: Colors.grey.withOpacity(0.1),
        appBar: MyAppBar(
          title: playlist.title,
        ),
        body: Container(
           color: Colors.grey[200],
          height: MediaQuery.of(context).size.height,
          width: MediaQuery.of(context).size.width,
          padding: EdgeInsets.all(20),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              const SizedBox(
                height: 60,
              ),
              Center(
                child: Container(
                  height: MediaQuery.of(context).size.width * 0.7,
                  width: MediaQuery.of(context).size.width * 0.7,
                  decoration: BoxDecoration(
                    color: Colors.grey.shade400,
                    image: DecorationImage(
                      image: AssetImage(
                        playlist.imageUrl,
                      ),
                      fit: BoxFit.cover,
                    ),
                  ),
                ),
              ),
              SizedBox(height: 30),
              Column(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    playlist.title,
                    style: TextStyle(
                     
                      fontWeight: FontWeight.bold,
                      fontSize: 25,
                    ),
                  ),
                  Text(
                    playlist.singer,
                    
                  ),
                ],
              ),
              SizedBox(height: 30),
              Slider(
                value: _position.inSeconds.toDouble(),
                onChanged: (value) async {
                  await player.seek(Duration(seconds: value.toInt()));
                  setState(() {});
                },
                min: 0,
                max: _duration.inSeconds.toDouble(),
                inactiveColor: Colors.grey[600],
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Text(
                    '${formatDuration(_position)} ',
                    style: TextStyle(
                      
                      fontWeight: FontWeight.bold,
                      fontSize: 15,
                    ),
                  ),
                  Text(
                    '${formatDuration(_duration)}',
                    style: TextStyle(
                     
                      fontWeight: FontWeight.bold,
                      fontSize: 15,
                    ),
                  ),
                ],
              ),
              const SizedBox(
                height: 20,
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceAround,
                children: [
                  IconButton(
                    onPressed: () {
                      player.seek(Duration(seconds: _position.inSeconds - 10));
                    },
                    icon: Icon(
                      Icons.skip_previous,
                     
                      size: 36,
                    ),
                  ),
                  IconButton(
                    onPressed: playOrPause,
                    icon: Icon(
                      isPlaying
                          ? Icons.pause
                          : Icons.play_arrow, // Sử dụng biến trạng thái local
                     
                      size: 40,
                    ),
                  ),
                  IconButton(
                    onPressed: () {
                      player.seek(Duration(seconds: _position.inSeconds + 10));
                    },
                    icon: Icon(
                      Icons.skip_next,
                     
                      size: 36,
                    ),
                  )
                ],
              )
            ],
          ),
        ),
      ),
    );
  }
}
