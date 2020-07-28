class Quiz {
  constructor(el) {
    // save self DOM element
    this.quiz = el;

    // construct sub components
    this.answers = this.constructAnswers();
    this.submit = this.constructSubmit();
    this.return = this.quiz.querySelector(".return");
  }

  constructAnswers() {
    let elements = this.quiz.getElementsByClassName("answer");
    let answers = [];

    for (let el of elements) {
      answers.push(new Answer(el));
    }

    return answers;
  }

  constructSubmit() {
    let submit = this.quiz.querySelector('button[type="submit"]');
    submit.addEventListener("click", this.handleSubmit.bind(this), false);

    return submit;
  }

  handleSubmit(e) {
    e.preventDefault();

    let result = true;

    this.answers.forEach((item) => {
      let state = item.getState();
      item.setState(state);

      if (state === false) {
        result = false;
      }
    });

    this.return.removeAttribute("hidden");
    // quiz success
    if (result === true) {
      this.return.classList.remove("flash-error");
      this.return.classList.add("flash-success");
      this.return.innerHTML = "Super, alles richtig!";
    } // quiz failed
    else if (result === false) {
      this.return.classList.remove("flash-success");
      this.return.classList.add("flash-error");
      this.return.innerHTML =
        "Leider nicht richtig! Schaue dir bitte die Rückmeldung an.";
    }
  }
}

class Answer {
  constructor(el) {
    this.answer = el;
    this.input = this.answer.querySelector("input");
  }

  getState() {
    if (
      this.input.checked == true && //
      this.input.hasAttribute("correct")
    ) {
      return true;
    } else if (
      this.input.checked == false && //
      this.input.hasAttribute("incorrect")
    ) {
      return true;
    } else {
      return false;
    }
  }

  setState(bool) {
    if (bool === true) {
      this.answer.classList.remove("errored");
    } else {
      this.answer.classList.add("errored");
    }
  }
}

export default Quiz;
