curl -X 'GET' \
  'http://127.0.0.1:8080/users' \
  -H 'accept: application/json'

curl -X 'POST' \
  'http://127.0.0.1:8080/users' \
  -H 'accept: text/html; charset=UTF-8' \
  -H 'Content-Type: application/json' \
  -d '[
  {
    "first_name": "Max",
    "last_name": "Max$",
    "active": 0
  },
  {
    "id": 4,
    "first_name": "Max$3",
    "last_name": "Max$4",
    "active": 0
  }
]'

curl -X 'GET' \
  'http://127.0.0.1:8080/users/4' \
  -H 'accept: application/json'

curl -X 'DELETE' \
  'http://127.0.0.1:8080/users/3' \
  -H 'accept: application/json'
