import 'package:mycourse_flutter/model/userresponse.dart';

abstract class Loginview {
  void onLoading(bool loading);
  void onLogin();
  void onString(String str);
  void onSuccess(Userresponse user);
}
