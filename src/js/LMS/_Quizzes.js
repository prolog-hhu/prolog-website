class Quizzes {

    constructor() {

        this.quiz = document.getElementById('sensei-quiz-list');

        if (this.quiz === null) {
            console.log('No Quiz here.')
            return;
        }

        this.questions = this.quiz.children;
        this.initializeQuestions();
    }


    initializeQuestions() {

        for (let elem of this.questions) {
            new Question(elem);
        }
    }
}

class Question {

    constructor(elem) {

        this.question = elem;
        this.answer = this.question.getElementsByClassName('answer_message')[0];
        this.message = this.question.getElementsByClassName('sensei-message')[0];

        this.state = this.getState();

        this.handleAnswer();
    }


    getState() {

        if (this.answer.classList.contains('user_right')) {
            return true

        } else if (this.answer.classList.contains('user_wrong')) {
            return false

        } else {
            return undefined
        }

    }

    handleAnswer() {

        if (this.state === true) {

            if (this.message !== undefined) {
                this.message.classList.add('sr-only');
            }

            this.answer.innerHTML += 'Alright, this is correct.';
            this.answer.className += ' sensei-message tick text-black';

        } else if (this.state === false) {

            this.answer.innerHTML += 'This answer is unfortunately wrong.';
            this.answer.className += ' sensei-message alert text-black';
        }
    }

}

export default Quizzes;