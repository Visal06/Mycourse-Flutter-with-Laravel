import 'package:flutter/material.dart';
import 'package:mycourse_flutter/screen/auth/login.dart';

class Register extends StatefulWidget {
  const Register({super.key});

  @override
  State<Register> createState() => _RegisterState();
}

class _RegisterState extends State<Register> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Container(
              width: 150.0,
              height: 150.0,
              child: Image.asset('assets/image/solo logo.png'),
            ),
            const Text(
              'Register before continuing',
              style: TextStyle(
                  letterSpacing: 3,
                  fontWeight: FontWeight.bold,
                  fontSize: 16.0),
            ),
            const SizedBox(height: 25.0),
            Container(
              margin: const EdgeInsets.only(left: 10.0, right: 16.0),
              child: const TextField(
                decoration: InputDecoration(
                    labelText: 'Username',
                    border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(16.0)))),
              ),
            ),
            const SizedBox(height: 16.0),
            Container(
              margin: const EdgeInsets.only(left: 10.0, right: 10.0),
              child: const TextField(
                decoration: InputDecoration(
                    labelText: 'Password',
                    border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(16.0)))),
              ),
            ),
            const SizedBox(height: 16.0),
            Container(
              margin: const EdgeInsets.only(left: 10.0, right: 10.0),
              child: const TextField(
                decoration: InputDecoration(
                    labelText: 'email@sample.com',
                    border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(16.0)))),
              ),
            ),
            const SizedBox(height: 16.0),
            InkWell(
              onTap: () {
                // Navigate to the login screen
                Navigator.push(context,
                    MaterialPageRoute(builder: (context) => LoginPage()));
              },
              child: Container(
                margin: const EdgeInsets.only(left: 10.0, right: 10.0),
                width: double.infinity,
                height: 45.0,
                alignment: Alignment.center,
                color: Colors.green,
                child: const Text(
                  'Sign Up',
                  style: TextStyle(
                      fontWeight: FontWeight.bold, color: Colors.white),
                ),
              ),
            ),
            const SizedBox(height: 16.0),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text(
                  "Already signed up?",
                  style: TextStyle(
                      color: Color.fromARGB(255, 3, 3, 3),
                      fontWeight: FontWeight.bold),
                ),
                const SizedBox(
                  width: 12.0,
                ),
                InkWell(
                  onTap: () {
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => LoginPage()));
                  },
                  child: const Text(
                    'Back to login',
                    style: TextStyle(
                        color: Colors.blue, fontWeight: FontWeight.bold),
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
      // floatingActionButton: FloatingActionButton(
      //   onPressed: () {
      //     // Go back to login page
      //     Navigator.pop(context);
      //   },
      //   child: Icon(Icons.arrow_back),
      // ),
    );
  }
}
