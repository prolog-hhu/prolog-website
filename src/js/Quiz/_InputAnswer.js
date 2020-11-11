import RandExp from "randexp";

import Answer from "./_Answer";

export default class InputAnswer extends Answer {
  constructor(obj) {
    super(obj, "input", ".response");

    // get embbed answer data
    this.data = JSON.parse(this.interaction.dataset.answers);
    
    // regex generator data
    this.regen = null;
  }

  updateState() {
    this.state = false;
    this.responseContent = "";

    // handle empty answer
    if (this.interaction.value == "") {
      this.state = false;
      this.responseContent = "Bitte gib eine Antwort ein!";
      return this.state;
    }

    // loop through each possible negative and positive answer
    for (const item of this.data) {
      // create regex and test it
      let regex = new RegExp(item["content"]);
      let match = regex.test(this.interaction.value);

      // positive correct match
      if (match && item["correct"] == true) {
        this.state = true;
        return this.state;
      }
      // negativ correct match
      else if (!match && item["correct"] == true) {
        this.state = false;
        this.responseContent += item["return"];
      }
      // negative incorrect match
      else if (match && item["correct"] == false) {
        this.state = false;
        this.responseContent += item["return"];
      }
      // no match
      else {
        this.state = false;
      }
    }
    return this.state;
  }

  solve() {

    for (const item of this.data) {
      if (item["correct"] && this.regen != item) {
        this.regen = item;
        break;
      }
    }

    let randexp = new RandExp(this.regen["content"]);
    randexp.max = 1;
    this.interaction.value = randexp.gen();
  }
}
