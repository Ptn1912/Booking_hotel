import 'package:booking_hotel/widgets/app_bar.dart';
import 'package:flutter/material.dart';
import 'package:booking_hotel/models/song_model.dart';
import 'package:booking_hotel/pages/music_page.dart';

class HomeMusics extends StatefulWidget {
  const HomeMusics({super.key});

  @override
  State<HomeMusics> createState() => _HomeMusicsState();
}

class _HomeMusicsState extends State<HomeMusics> {
  List<Playlist> playlists = Playlist.playlists;
  int _currentIndex = 0;
  @override
  Widget build(BuildContext context) {
    List<Playlist> playlists = Playlist.playlists;
    return Container(
      child: Scaffold(
        backgroundColor: Colors.transparent,
        appBar: MyAppBar(
          title: 'Your Music',
        ),
        
        body: SingleChildScrollView(
          child: Column(
            children: [
              Padding(
                padding: const EdgeInsets.all(20.0),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text('Welcome',
                        style: Theme.of(context).textTheme.bodyLarge!.copyWith(
                            fontWeight: FontWeight.bold, color: Colors.white)),
                    const SizedBox(height: 5),
                    Text('Enjoy your favourite music',
                        style: Theme.of(context).textTheme.headline6!.copyWith(
                            fontWeight: FontWeight.bold, color: Colors.white)),
                    const SizedBox(height: 30),
                    TextFormField(
                      decoration: InputDecoration(
                          filled: true,
                          fillColor: Colors.white,
                          hintText: "Search",
                          hintStyle: Theme.of(context)
                              .textTheme
                              .bodyMedium!
                              .copyWith(color: Colors.grey.shade400),
                          prefixIcon:
                              Icon(Icons.search, color: Colors.grey.shade400),
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(50.0),
                              borderSide: BorderSide.none)),
                    ),
                    const SizedBox(height: 20),
                    ListView.builder(
                      shrinkWrap: true,
                      itemCount: playlists.length,
                      itemBuilder: (context, index) {
                        // Check if playlists or playlists[index] is null
                        if (playlists == null ||
                            playlists.isEmpty ||
                            playlists[index] == null) {
                          return Container(); // or some placeholder widget
                        }
                        return GestureDetector(
                          onTap: () => Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (_) =>
                                      MusicPage(playlist: playlists[index]))),
                          child: Container(
                            height: 80,
                            margin: EdgeInsets.only(bottom: 10),
                            padding: EdgeInsets.symmetric(horizontal: 10),
                            child: Row(
                              mainAxisAlignment: MainAxisAlignment.spaceAround,
                              children: [
                                ClipRRect(
                                  borderRadius: BorderRadius.circular(15),
                                  child: Image.asset(
                                    playlists[index].imageUrl ??
                                        '', // Handle null imageUrl
                                    height: 70,
                                    width: 70,
                                    fit: BoxFit.cover,
                                  ),
                                ),
                                const SizedBox(
                                  width: 20,
                                ),
                                Expanded(
                                  child: Column(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text(
                                        playlists[index].title ??
                                            '', // Handle null title
                                        style: Theme.of(context)
                                            .textTheme
                                            .bodyLarge!
                                            .copyWith(
                                              fontWeight: FontWeight.bold,
                                              color: Colors.white,
                                            ),
                                      ),
                                      Text(
                                        playlists[index].singer ??
                                            '', // Handle null singer
                                        maxLines: 2,
                                        style: Theme.of(context)
                                            .textTheme
                                            .bodySmall!
                                            .copyWith(
                                              color: Colors.grey.shade400,
                                            ),
                                      ),
                                    ],
                                  ),
                                ),
                                IconButton(
                                  onPressed: () {
                                    // Handle button press
                                  },
                                  icon: Icon(
                                    Icons.play_circle,
                                    color: Colors.white,
                                  ),
                                ),
                              ],
                            ),
                          ),
                        );
                      },
                    )
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
