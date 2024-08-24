import 'dart:convert';
import 'package:mycourse_flutter/api/api_service.dart';
import 'package:mycourse_flutter/model/user.dart';
import 'package:mycourse_flutter/model/userresponse.dart';
import 'package:mycourse_flutter/screen/auth/logic/loginview.dart';
import 'package:http/http.dart' as http;

class Loginpresentor {
  final Loginview view;
  Loginpresentor(this.view);

  Future<void> loginRequest() async {
    view.onLoading(true);
    UserLoginRequest request = UserLoginRequest();
    request.email = "asss@gmail.com";
    request.password = "admin123456";

    try {
      var response = await http.post(Uri.parse(ApiService.loginapi),
          headers: {'Content-type': 'application/json'},
          body: jsonEncode(request.toJson()));
      print(response.statusCode);
      if (response.statusCode == 200) {
        print(jsonEncode(response.body));

        view.onLoading(false);
        view.onString('Login Success');
        Userresponse userresponse =
            Userresponse.fromJson(jsonDecode(response.body));
        view.onSuccess(userresponse);
      }
    } catch (e) {
      view.onLoading(false);
    }
  }
}
