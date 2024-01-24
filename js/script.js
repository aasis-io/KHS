    let stagebtn1 = document.querySelector(".next-step"),
      stagebtn2b = document.querySelector(".stagebtn2b"),
      stagebtn2a = document.querySelector(".stagebtn2a"),
      stagebtn3a = document.querySelector(".stagebtn3a"),
      stagebtn3b = document.querySelector(".stagebtn3b"),
      stagebtn4a = document.querySelector(".stagebtn4a"),
      submitBtn = document.getElementById("submitBtn"),
      step1btn = document.querySelector(".step1 > .list-num"),
      step2btn = document.querySelector(".step2 >.list-num"),
      step3btn = document.querySelector(".step3 >.list-num"),
      step4btn = document.querySelector(".step4 >.list-num"),
      firstContainer = document.querySelector(".step-one-container"),
      secondContainer = document.querySelector(".step-two-container"),
      thirdContainer = document.querySelector(".step-three-container"),
      fourthContainer = document.querySelector(".step-four-container"),
      myForm = document.getElementById("myForm");

    const navigateTo = (fromContainer, toContainer, fromStep, toStep) => {
      fromContainer.classList.add("hidden");
      toContainer.classList.remove("hidden");
      fromStep.classList.remove("lists-active");
      toStep.classList.add("lists-active");
    };

    const stage1to2 = (event) => {
      event.preventDefault();
      navigateTo(firstContainer, secondContainer, step1btn, step2btn);
    };
    stagebtn1.addEventListener("click", stage1to2);

    const stage2to1 = (event) => {
      event.preventDefault();
      navigateTo(secondContainer, firstContainer, step2btn, step1btn);
    };
    stagebtn2a.addEventListener("click", stage2to1);

    const stage2to3 = (event) => {
      event.preventDefault();
      navigateTo(secondContainer, thirdContainer, step2btn, step3btn);
    };
    stagebtn2b.addEventListener("click", stage2to3);

    const stage3to2 = (event) => {
      event.preventDefault();
      navigateTo(thirdContainer, secondContainer, step3btn, step2btn);
    };
    stagebtn3a.addEventListener("click", stage3to2);

    const stage3to4 = (event) => {
      event.preventDefault();
      navigateTo(thirdContainer, fourthContainer, step3btn, step4btn);
    };
    stagebtn3b.addEventListener("click", stage3to4);

    const stage4to3 = (event) => {
      event.preventDefault();
      navigateTo(fourthContainer, thirdContainer, step4btn, step3btn);
    };
    stagebtn4a.addEventListener("click", stage4to3);

    const submitForm = (event) => {
      event.preventDefault(); // Ensure this line is present to prevent the default form submission
      myForm.submit();
    };




    