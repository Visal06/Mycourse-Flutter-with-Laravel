import 'package:flutter/material.dart';
import 'package:carousel_slider/carousel_slider.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    //bannner sliders images
    final List<String> imgList = [
      'assets/image/b1.webp',
      'assets/image/b2.jpg',
      'assets/image/b3.webp',
      'assets/image/b4.webp',
      'assets/image/b5.jpg',
      'assets/image/b6.jpg',
      'assets/image/pro.png',
    ];
    return Scaffold(
      body: SingleChildScrollView(
        child: Column(
          children: [
            const SizedBox(
              height: 50,
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Container(
                  margin: const EdgeInsets.only(left: 14),
                  width: 60,
                  height: 60,
                  decoration: BoxDecoration(
                    borderRadius: BorderRadius.circular(50),
                    border: Border.all(width: 2, color: Colors.black),
                  ),
                  child: Image.asset('assets/image/profile.png'),
                ),
                Container(
                  margin: const EdgeInsets.only(left: 30),
                  child: const Column(
                    children: [
                      Text(
                        'World Beauty Cosmetic',
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                      Text(
                        'Super VIP Customer',
                        style: TextStyle(fontSize: 16),
                      ),
                    ],
                  ),
                ),
                Container(
                  width: 30,
                  height: 30,
                  margin: const EdgeInsets.only(right: 5, left: 41),
                  child: InkWell(
                      onTap: () {},
                      child: Image.asset('assets/image/search.webp')),
                ),
              ],
            ),
            //bannner sliders
            const SizedBox(height: 22),
            CarouselSlider(
              items: imgList
                  .map((item) => Center(
                        child:
                            Image.asset(item, fit: BoxFit.cover, width: 1000),
                      ))
                  .toList(),
              options: CarouselOptions(
                height: 200,
                autoPlay: true,
                enlargeCenterPage: true,
              ),
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Container(
                  margin: const EdgeInsets.only(left: 16, right: 16),
                  child: const Text(
                    'Featured Products',
                    style: TextStyle(fontSize: 24, fontWeight: FontWeight.bold),
                  ),
                ),
                InkWell(
                  onTap: () => {},
                  child: Container(
                    margin: const EdgeInsets.only(left: 16, right: 16),
                    child: const Text(
                      'View All',
                      style: TextStyle(fontSize: 16),
                    ),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 22),
            Card(
              color: Colors.white,
              child: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      margin: const EdgeInsets.only(left: 22, right: 22),
                      child: Image.asset(
                        'assets/image/1.png',
                        width: 85,
                        height: 85,
                      ),
                    ),
                    Container(
                      margin: const EdgeInsets.only(right: 30),
                      child: const Text(
                        "\$200",
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            Card(
              color: Colors.white,
              child: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      margin: const EdgeInsets.only(left: 22, right: 22),
                      child: Image.asset(
                        'assets/image/2.png',
                        width: 85,
                        height: 85,
                      ),
                    ),
                    Container(
                      margin: const EdgeInsets.only(right: 30),
                      child: const Text(
                        "\$200",
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            Card(
              color: Colors.white,
              child: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      margin: const EdgeInsets.only(left: 22, right: 22),
                      child: Image.asset(
                        'assets/image/3.png',
                        width: 85,
                        height: 85,
                      ),
                    ),
                    Container(
                      margin: const EdgeInsets.only(right: 30),
                      child: const Text(
                        "\$200",
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            Card(
              color: Colors.white,
              child: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      margin: const EdgeInsets.only(left: 22, right: 22),
                      child: Image.asset(
                        'assets/image/4.png',
                        width: 85,
                        height: 85,
                      ),
                    ),
                    Container(
                      margin: const EdgeInsets.only(right: 30),
                      child: const Text(
                        "\$200",
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            Card(
              color: Colors.white,
              child: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      margin: const EdgeInsets.only(left: 22, right: 22),
                      child: Image.asset(
                        'assets/image/5.png',
                        width: 85,
                        height: 85,
                      ),
                    ),
                    Container(
                      margin: const EdgeInsets.only(right: 30),
                      child: const Text(
                        "\$200",
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            Card(
              color: Colors.white,
              child: InkWell(
                onTap: () {},
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Container(
                      margin: const EdgeInsets.only(left: 22, right: 22),
                      child: Image.asset(
                        'assets/image/6.png',
                        width: 85,
                        height: 85,
                      ),
                    ),
                    Container(
                      margin: const EdgeInsets.only(right: 30),
                      child: const Text(
                        "\$200",
                        style: TextStyle(
                            fontSize: 18, fontWeight: FontWeight.bold),
                      ),
                    ),
                  ],
                ),
              ),
            ),
            const SizedBox(height: 100),
          ],
        ),
      ),
    );
  }
}
