var inputs = document.querySelectorAll( 'input[type=text], input[type=url]' );
for (i = 0; i < inputs.length; i ++) {
  var inputEl = inputs[i];
  if( inputEl.value.trim() !== '' ) {
  	inputEl.parentNode.classList.add( 'input--filled' );
  }
  inputEl.addEventListener( 'focus', onFocus );
  inputEl.addEventListener( 'blur', onBlur );
}

function onFocus( ev ) {
  ev.target.parentNode.classList.add( 'inputs--filled' );
}

function onBlur( ev ) {
  if ( ev.target.value.trim() === '' ) {
  	ev.target.parentNode.classList.remove( 'inputs--filled' );
  } else if ( ev.target.checkValidity() == false ) {
    ev.target.parentNode.classList.add( 'inputs--invalid' );
    ev.target.addEventListener( 'input', liveValidation );
  } else if ( ev.target.checkValidity() == true ) {
    ev.target.parentNode.classList.remove( 'inputs--invalid' );
    ev.target.addEventListener( 'input', liveValidation );
  }
}

function liveValidation( ev ) {
  if ( ev.target.checkValidity() == false ) {
    ev.target.parentNode.classList.add( 'inputs--invalid' );
  } else {
    ev.target.parentNode.classList.remove( 'inputs--invalid' );
  }
}

var submitBtn = document.querySelector( 'input[type=submit]' );
submitBtn.addEventListener( 'click', onSubmit );

function onSubmit( ev ) {
  var inputsWrappers = ev.target.parentNode.querySelectorAll( 'span' );
  for (i = 0; i < inputsWrappers.length; i ++) {
    input = inputsWrappers[i].querySelector( 'input[type=text], input[type=email]' );
    if ( input.checkValidity() == false ) {
      inputsWrappers[i].classList.add( 'inputs--invalid' );
    } else if ( input.checkValidity() == true ) {
      inputsWrappers[i].classList.remove( 'inputs--invalid' );
    }
  }
}
  const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.getElementById("submit");
const closeModalBtn = document.querySelector(".btn-close");

// close modal function
const closeModal = function () {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

// close the modal when the close button and overlay is clicked
closeModalBtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});

// open modal function
const openModal = function () {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};
// open modal event
openModalBtn.addEventListener("click", openModal);
function copyToClipboard() {
    var textBox = document.getElementById("copyurl");
    textBox.select();
    document.execCommand("copy");
}
