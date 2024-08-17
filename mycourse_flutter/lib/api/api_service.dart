// import 'dart:convert';
// import 'package:http/http.dart' as http;

// class ApiService {
//   final String baseUrl = 'http://localhost:8000/api';

//   Future<String?> login(String email, String password) async {
//     final response = await http.post(
//       Uri.parse('$baseUrl/login'),
//       headers: {'Content-Type': 'application/json'},
//       body: jsonEncode({'email': email, 'password': password}),
//     );

//     if (response.statusCode == 200) {
//       final data = jsonDecode(response.body);
//       return data['token'];
//     } else {
//       return null;
//     }
//   }
// }

const String base = "http://localhost:8000/api";

class ApiService {
  static const String loginapi = "$base/login";
  static const String registerapi = "$base/register";
}
