import 'package:flutter/material.dart';
import 'package:mycourse_flutter/component/button.dart';
import 'package:mycourse_flutter/model/user.dart';
import 'package:mycourse_flutter/model/userresponse.dart';
import 'package:mycourse_flutter/screen/auth/forgot.dart';
import 'package:mycourse_flutter/screen/auth/logic/loginpresentor.dart';
import 'package:mycourse_flutter/screen/auth/logic/loginview.dart';
import 'package:mycourse_flutter/screen/auth/register.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({super.key});

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> implements Loginview {
  TextEditingController userController =
      TextEditingController(text: 'asss@gmail.com');
  TextEditingController passwordController =
      TextEditingController(text: 'admin123456');
  bool isErro = true;
  late Loginpresentor presentor;
  late final UserModel? userModel;
  late bool loadin;
  late String responsetext;

  @override
  void initState() {
    super.initState();
    presentor = Loginpresentor(this);
    // userModel = UserModel();
    // loadin = false;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            SizedBox(
              width: 200.0,
              height: 200.0,
              child: Image.asset('assets/image/solo logo.png'),
            ),
            const SizedBox(height: 22),
            const Text(
              'Welcome to the Keels Login page',
              style: TextStyle(
                  letterSpacing: 3,
                  fontWeight: FontWeight.bold,
                  fontSize: 16.0),
            ),
            const SizedBox(height: 22.0),
            Container(
              margin: const EdgeInsets.only(left: 12.0, right: 16.0),
              alignment: Alignment.center,
              child: TextField(
                controller: userController,
                decoration: InputDecoration(
                  labelText: 'Username',
                  border: OutlineInputBorder(
                      borderRadius: BorderRadius.all(Radius.circular(20))),
                ),
              ),
            ),
            const SizedBox(height: 20.0),
            Container(
              margin: const EdgeInsets.only(left: 12.0, right: 12.0),
              child: TextField(
                controller: passwordController,
                obscureText: true,
                decoration: InputDecoration(
                  labelText: 'password',
                  border: OutlineInputBorder(
                      borderRadius: BorderRadius.all(Radius.circular(20))),
                  // Show password as dots
                ),
              ),
            ),
            const SizedBox(height: 16.0),
            ButtonComponent(label: "Login", onclick: onLogin),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                InkWell(
                  onTap: () {
                    // Navigate to the registration screen
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => ForgotPage()));
                  },
                  child: const Text(
                    "forgot password?",
                    style: TextStyle(
                        color: Colors.red, fontWeight: FontWeight.bold),
                  ),
                ),
                const SizedBox(
                  width: 12.0,
                ),
                InkWell(
                  onTap: () {
                    Navigator.push(context,
                        MaterialPageRoute(builder: (context) => Register()));
                  },
                  child: const Text(
                    'Register',
                    style: TextStyle(
                        color: Colors.blue, fontWeight: FontWeight.bold),
                  ),
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }

  @override
  void onLoading(bool loading) {
    setState(() {
      loadin = loading;
    });
  }

  @override
  void onLogin() {
    setState(() {
      presentor.loginRequest();
    });
  }

  @override
  void onString(String str) {
    setState(() {
      responsetext = str;
    });
  }

  @override
  void onSuccess(Userresponse userresponse) {
    setState(() {
      userModel = userresponse.user;
    });
  }
}
