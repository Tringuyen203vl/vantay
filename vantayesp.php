<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dữ liệu Vân tay</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f0f0f0;
    }
    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 80%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    tr:nth-child(even){background-color: #f2f2f2;}
    tr:hover {background-color: #ddd;}
  </style>
</head>
<body>
  <h1>Dữ liệu Vân tay</h1>
  <table>
    <thead>
      <tr>
        <th>ID ESP</th>
        <th>ID Vân tay</th>
        <th>Thời gian</th>
      </tr>
    </thead>
    <tbody id="data-body">
      <!-- Dữ liệu sẽ được thêm vào đây -->
    </tbody>
  </table>

  <script>
    const channelID = "https://thingspeak.mathworks.com/channels/2783657"; // Thay bằng Channel ID của bạn
    const readAPIKey = "FZUQDUYN7ON76T8P"; // Thay bằng Read API Key của bạn
    const apiURL = `https://api.thingspeak.com/channels/${channelID}/feeds.json?api_key=${readAPIKey}&results=20`;

    fetch(apiURL)
      .then(response => response.json())
      .then(data => {
        const feeds = data.feeds;
        const tbody = document.getElementById('data-body');
        feeds.forEach(feed => {
          const tr = document.createElement('tr');
          const espID = feed.field1;
          const fingerprintID = feed.field2;
          const dateTime = feed.field3;
          
          tr.innerHTML = `<td>${espID}</td><td>${fingerprintID}</td><td>${dateTime}</td>`;
          tbody.appendChild(tr);
        });
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  </script>
</body>
</html>
