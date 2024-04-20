import 'package:flutter/material.dart';

class AppText extends StatelessWidget {
  final String text;
  final TextStyle style;
  final TextAlign textAlign;

  const AppText({
    Key? key,
    required this.text,
    this.style = const TextStyle(),
    this.textAlign = TextAlign.start,
  }) : super(key: key);

  factory AppText.large({
    Key? key,
    required String text,
    TextAlign textAlign = TextAlign.start,
    Color? color,
    FontWeight fontWeight = FontWeight.bold,
  }) {
    return AppText(
      key: key,
      text: text,
      style: TextStyle(
        fontSize: 24.0, // or any other appropriate large font size
        color: color,
        fontWeight: fontWeight,
      ),
      textAlign: textAlign,
    );
  }

  factory AppText.medium({
    Key? key,
    required String text,
    TextAlign textAlign = TextAlign.start,
    Color? color,
    FontWeight fontWeight = FontWeight.normal,
  }) {
    return AppText(
      key: key,
      text: text,
      style: TextStyle(
        fontSize: 18.0, // or any other appropriate medium font size
        color: color,
        fontWeight: FontWeight.bold,
      ),
      textAlign: textAlign,
    );
  }

  factory AppText.small({
    Key? key,
    required String text,
    TextAlign textAlign = TextAlign.start,
    Color? color,
    FontWeight fontWeight = FontWeight.normal,
  }) {
    return AppText(
      key: key,
      text: text,
      style: TextStyle(
        fontSize: 14.0, // or any other appropriate small font size
        color: color,
        fontWeight: FontWeight.w500,
      ),
      textAlign: textAlign,
    );
  }

  @override
  Widget build(BuildContext context) {
    return Text(
      text,
      style: style,
      textAlign: textAlign,
    );
  }
}

class AppTextSpan extends TextSpan {
  final String text;
  final TextStyle style;

  AppTextSpan({
    required this.text,
    this.style = const TextStyle(),
  });

  factory AppTextSpan.large({
    required String text,
    TextAlign textAlign = TextAlign.start,
    Color? color,
    FontWeight fontWeight = FontWeight.bold,
    double fontSize = 24.0,
    double letterSpacing = 0.0,
    double height = 1.0,
  }) {
    return AppTextSpan(
      text: text,
      style: TextStyle(
        fontSize: fontSize,
        color: color,
        fontWeight: fontWeight,
        letterSpacing: letterSpacing,
        height: height,
      ),
    );
  }

  factory AppTextSpan.medium({
    required String text,
    TextAlign textAlign = TextAlign.start,
    Color? color,
    FontWeight fontWeight = FontWeight.bold,
    double fontSize = 16.0,
    double letterSpacing = 0.0,
    double height = 1.0,
  }) {
    return AppTextSpan(
      text: text,
      style: TextStyle(
        fontSize: fontSize,
        color: color,
        fontWeight: fontWeight,
        letterSpacing: letterSpacing,
        height: height,
      ),
    );
  }

  factory AppTextSpan.small({
    required String text,
    TextAlign textAlign = TextAlign.start,
    Color? color,
    FontWeight fontWeight = FontWeight.bold,
    double fontSize = 14.0,
    double letterSpacing = 0.0,
    double height = 1.0,
  }) {
    return AppTextSpan(
      text: text,
      style: TextStyle(
        fontSize: fontSize,
        color: color,
        fontWeight: fontWeight,
        letterSpacing: letterSpacing,
        height: height,
      ),
    );
  }
}
