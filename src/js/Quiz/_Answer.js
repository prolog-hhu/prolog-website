export default class Answer {
  constructor(obj, interactionSelector, responseSelector) {
    // save self DOM elements, state handler, response
    this.obj = obj;
    this.interaction = this.obj.querySelector(interactionSelector);
    this.response = this.obj.querySelector(responseSelector);

    this.state = null;
    this.responseContent = "";
  }

  updateState() {
    throw InternalError("Method not implemented by Sublass!");
  }

  updateResponse() {
    // handle answer correct
    if (this.state === true) {
      this.obj.classList.remove("errored");
      this._setResponse("");
    }
    // handle answer incorrect
    else {
      this.obj.classList.add("errored");

      // set individual response
      if (this.responseContent != "") {
        this._setResponse(this.responseContent);
      }
      // set default response
      else {
        this._setResponse(config["DefaultResponseFalse"]);
      }
    }
  }

  _setResponse(content) {
    if (this.response != undefined) {
      this.response.innerHTML = content;
    }
  }
}

const config = {
  DefaultResponseFalse: "Nicht richtig! Keine individuelle Rückmeldung.",
};
