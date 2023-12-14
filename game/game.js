document.addEventListener('DOMContentLoaded', () => {
    const totalQuestions = document.querySelectorAll('.question-container').length;
    let currentQuestionIndex = 0;
    let userAnswers = [];
    let timer = 15000; // 15 seconds in milliseconds
    let score = 15000;
    let interval;
    let failedQuestions = 0; // Number of questions failed due to time
    let failedCurrentQuestion = false; // Whether the current question was failed due to time



    function updateTimer() {
        timer -= 100; // Decrease timer every 100 milliseconds
        score -= 100; // Decrease score every 100 milliseconds
        updateTimerBar();

        if (timer <= 0) {
            timer = 0;
            score = 0;
            failedQuestions++; // Increment failed questions count
        } else if (timer > 15000) {
            timer = 15000;
        }
    }

    function updateTimerBar() {
        const timerBar = document.getElementById('timer-bar');
        const widthPercentage = (timer / 15000) * 100;
        timerBar.style.width = widthPercentage + 'vw';

        if (timer <= 5000) {
            timerBar.classList.add('blinking');
        } else {
            timerBar.classList.remove('blinking');
        }
    }

    function resetTimerBarColor() {
        setTimeout(() => {
            const timerBar = document.getElementById('timer-bar');
            timerBar.classList.remove('green');
        }, 1000);
    }

    document.querySelectorAll('.answer').forEach(answer => {
        answer.addEventListener('click', function() {
            userAnswers[currentQuestionIndex] = this.id;
            if (timer === 0 && !failedCurrentQuestion) {
                score -= 5500;
                failedCurrentQuestion = true;
            }
            timer += 5000; // Add 5 seconds for every answer
            if (!interval) {
                interval = setInterval(updateTimer, 1000);
            }
            const timerBar = document.getElementById('timer-bar');
            timerBar.classList.add('green');
            resetTimerBarColor();
            currentQuestionIndex++;
            failedCurrentQuestion = false;
            if (currentQuestionIndex < totalQuestions) {
                showQuestion(currentQuestionIndex);
            } else {
                clearInterval(interval);
                finishQuiz();
            }
        });
    });

    function showQuestion(index) {
        document.querySelectorAll('.question-container').forEach((elem, i) => {
            elem.style.display = i === index ? 'block' : 'none';
        });
    }

    function finishQuiz() {
        const quizResultsForm = document.getElementById('quiz-results');
        const userAnswersInput = document.getElementById('user-answers');
        const userScoreInput = document.getElementById('user-score');
        const failedQuestionsInput = document.getElementById('failed-questions');

        userAnswersInput.value = JSON.stringify(userAnswers);
        userScoreInput.value = score > 0 ? score : 0;
        failedQuestionsInput.value = failedQuestions;

        quizResultsForm.submit();
    }

    interval = setInterval(updateTimer, 100);
    showQuestion(currentQuestionIndex);
});
