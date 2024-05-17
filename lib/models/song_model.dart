class Playlist{
  final String title;
  final String singer;
  final String imageUrl;
final String audio;
  Playlist({required this.title, required this.singer, required this.imageUrl,required this.audio});
static List<Playlist> playlists=[
  Playlist(title: 'Snooze', singer: 'SZA', imageUrl: 'assets/images/sza.webp',audio:'audio/3.mp3'),
  Playlist(title: 'Water', singer: 'Tyla', imageUrl: 'assets/images/tyla.webp',audio:'audio/1.mp3'),
  Playlist(title: 'See You Again', singer: 'Charlie Puth', imageUrl: 'assets/images/charlie.png',audio:'audio/2.mp3'),
  Playlist(title: 'Gone', singer: 'Rose', imageUrl: 'assets/images/rose.jpg',audio:'audio/5.mp3'),
  Playlist(title: 'Blinding Lights', singer: 'Weekend', imageUrl: 'assets/images/weekend.jpg',audio:'audio/6.mp3'),
  Playlist(title: 'Dont know what to do', singer: 'BlackPink', imageUrl: 'assets/images/blink.jpg',audio:'audio/7.mp3'),
  Playlist(title: 'Cruel Summer', singer: 'Taylor Swift', imageUrl: 'assets/images/s1.webp',audio:'audio/4.mp3'),
];
}
