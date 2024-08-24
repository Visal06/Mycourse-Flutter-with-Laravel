// import 'package:carousel_slider/carousel_slider.dart' as carousel_slider;
import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/material.dart';
import 'package:smooth_page_indicator/smooth_page_indicator.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  // ignore: library_private_types_in_public_api
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  final PageController _carouselController = PageController();
  @override
  Widget build(BuildContext context) {
    // banner sliders images
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
            AppBar(
              title: Text(
                'Home',
                style: TextStyle(color: Colors.white),
              ),
              elevation: 0,
              backgroundColor: Colors.green,
              centerTitle: true,
            ),

            // banner sliders
            const SizedBox(height: 22),
            Stack(
              children: [
                CarouselSlider(
                  items: imgList
                      .map((item) => Center(
                            child: Image.asset(item,
                                fit: BoxFit.cover, width: 1000),
                          ))
                      .toList(),
                  // carouselController: _carouselController,
                  options: CarouselOptions(
                    height: 200,
                    autoPlay: true,
                    enlargeCenterPage: true,
                    onPageChanged: (index, reason) {
                      setState(() {});
                    },
                  ),
                ),
                Positioned(
                  bottom: 10,
                  left: 0,
                  right: 0,
                  child: Center(
                    child: SmoothPageIndicator(
                      controller: _carouselController,
                      count: imgList.length,
                      effect: ExpandingDotsEffect(
                        dotWidth: 10,
                        dotHeight: 10,
                        expansionFactor: 4,
                        spacing: 5,
                        activeDotColor: Colors.green,
                        dotColor: Colors.grey,
                      ),
                    ),
                  ),
                ),
              ],
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
            _buildProductCard('assets/image/1.png', '\$200'),
            _buildProductCard('assets/image/2.png', '\$200'),
            _buildProductCard('assets/image/3.png', '\$200'),
            _buildProductCard('assets/image/4.png', '\$200'),
            _buildProductCard('assets/image/5.png', '\$200'),
            _buildProductCard('assets/image/6.png', '\$200'),
            const SizedBox(height: 100),
          ],
        ),
      ),
    );
  }

  Card _buildProductCard(String imagePath, String price) {
    return Card(
      color: Colors.white,
      child: InkWell(
        onTap: () {},
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            Container(
              margin: const EdgeInsets.only(left: 22, right: 22),
              child: Image.asset(
                imagePath,
                width: 85,
                height: 85,
              ),
            ),
            Container(
              margin: const EdgeInsets.only(right: 30),
              child: Text(
                price,
                style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
              ),
            ),
          ],
        ),
      ),
    );
  }
}
