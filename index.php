<!DOCTYPE html>
<html>
<head>
  <title>Tic-Tac-Toe</title>
  <style>
    h1 {
      text-align: center;
    }

    .game-board {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    .row {
      display: flex;
    }

    .cell {
      width: 100px;
      height: 100px;
      border: 1px solid black;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 40px;
      cursor: pointer;
    }

    button {
      display: block;
      margin: 20px auto;
    }
  </style>
</head>
<body>
  <h1>Tic-Tac-Toe</h1>
  <div class="game-board">
    <?php include 'game.php'; ?>
  </div>
  <?php include 'message.php'; ?>
  <button onclick="resetGame()">Reset</button>
  <script>
    function makeMove(row, col) {
      location.href = 'move.php?row=' + row + '&col=' + col;
    }

    function resetGame() {
      location.href = 'reset.php';
    }
  </script>
</body>
</html>
