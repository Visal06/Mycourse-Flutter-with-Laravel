class UserModel {
  int? id;
  String? name;
  String? email;

  UserModel({
    this.id,
    this.name,
    this.email,
  });

  UserModel.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    return data;
  }
}

class UserLoginRequest {
  String? email;
  String? password;
  UserLoginRequest({this.email, this.password});
  Map<String, dynamic> toJson() {
    return {'email': email, 'password': password};
  }
}
