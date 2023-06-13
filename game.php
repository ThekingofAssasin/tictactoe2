<?php
session_start();

// Initialize the game board
if (!isset($_SESSION['board'])) {
  $_SESSION['board'] = [
    ['', '', ''],
    ['', '', ''],
    ['', '', '']
  ];
}

// Initialize the current player
if (!isset($_SESSION['currentPlayer'])) {
  $_SESSION['currentPlayer'] = 'X';
}

// Check if the game is over
function isGameOver($board) {
  // Check rows
  for ($i = 0; $i < 3; $i++) {
    if ($board[$i][0] !== '' && $board[$i][0] === $board[$i][1] && $board[$i][1] === $board[$i][2]) {
      return true;
    }
  }

  // Check columns
  for ($i = 0; $i < 3; $i++) {
    if ($board[0][$i] !== '' && $board[0][$i] === $board[1][$i] && $board[1][$i] === $board[2][$i]) {
      return true;
    }
  }

  // Check diagonals
  if ($board[0][0] !== '' && $board[0][0] === $board[1][1] && $board[1][1] === $board[2][2]) {
    return true;
  }

  if ($board[0][2] !== '' && $board[0][2] === $board[1][1] && $board[1][1] === $board[2][0]) {
    return true;
  }

  return false;
}

// Check if the game is a draw
function isDraw($board) {
  for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
      if ($board[$i][$j] === '') {
        return false;
      }
    }
  }
  return true;
}

// Process the user's move
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['row']) && isset($_GET['col'])) {
  $row = $_GET['row'];
  $col = $_GET['col'];

  $board = $_SESSION['board'];
  $currentPlayer = $_SESSION['currentPlayer'];

  if ($board[$row][$col] === '' && !isGameOver($board) && !isDraw($board)) {
    $board[$row][$col] = $currentPlayer;

    if (isGameOver($board)) {
      $_SESSION['message'] = 'Player ' . $currentPlayer . ' wins!';
    } elseif (isDraw($board)) {
      $_SESSION['message'] = "It's a draw!";
    } else {
      $currentPlayer = ($currentPlayer === 'X') ? 'O' : 'X';
    }

    $_SESSION['board'] = $board;
    $_SESSION['currentPlayer'] = $currentPlayer;
  }

  header('Location: index.php');
  exit();
}
?>

<?php foreach ($_SESSION['board'] as $row => $cells): ?>
  <div class="row">
    <?php foreach ($cells as $col => $cell): ?>
      <div class="cell" onclick="makeMove(<?php echo $row; ?>, <?php echo $col; ?>)">
        <?php echo $cell; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endforeach; ?>
