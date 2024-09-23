<?php
// Correct answers
$correctAnswers = [
    'q1' => 'c', // Paris
    'q2' => 'b', // 4
    'q3' => 'b', // 4
    'q4' => 'b', // 4
    'q5' => 'b', // 4
    'q6' => 'b', // 4
    'q7' => 'b', // 4
    'q8' => 'b', // 4
    'q9' => 'b', // 4
    'q10' => 'b', // 4

    // Add correct answers for other questions here
];

// Initialize score
$score = 0;
$score = $_POST["score"];
$totalQuestions = 10; // Total number of questions

// Calculate score
foreach ($correctAnswers as $question => $correctAnswer) {
    if (isset($_POST[$question]) && $_POST[$question] == $correctAnswer) {
        $score++;
    }
}

// Calculate percentage
$percentage = ($score / $totalQuestions) * 100;

if ($percentage >= 60) {
    // If score is 60% or more, show form to enter name and ID
    echo "<h2>Congratulations! You scored " . $percentage . "%.</h2>";
    echo "<form action='store_quiz_data.php' method='post'>
            Name: <input type='text' name='name' required><br>
            ID: <input type='text' name='id' required><br>
            <input type='submit' value='Submit'>
          </form>";
} else {
    // If score is less than 60%, ask the user to retake the quiz
    echo "<h2>You scored " . $percentage . "%.</h2>";
    echo "<p>Sorry, you didn't pass. Please retake the quiz.</p>";
    echo "<a href='quiz.php'>Retake Quiz</a>";
}
?>
