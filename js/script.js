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




    // let stagebtn1 = document.querySelector(".next-step"),
    //   stagebtn2b = document.querySelector(".stagebtn2b"),
    //   stagebtn2a = document.querySelector(".stagebtn2a"),
    //   stagebtn3a = document.querySelector(".stagebtn3a"),
    //   stagebtn3b = document.querySelector(".stagebtn3b"),

    //   stagebtn4a = document.querySelector(".stagebtn4a"),

    //   submitBtn = document.getElementById("submitBtn"),



    //   step1btn = document.querySelector(".step1 > .list-num"),
    //   step2btn = document.querySelector(".step2 >.list-num"),
    //   step3btn = document.querySelector(".step3 >.list-num"),
    //   step4btn = document.querySelector(".step4 >.list-num"),

    //   firstContainer = document.querySelector(".step-one-container"),
    //   secondContainer = document.querySelector(".step-two-container"),
    //   thirdContainer = document.querySelector(".step-three-container"),
    //   fourthContainer = document.querySelector(".step-four-container"),
    //   myForm = document.getElementById("myForm");

    // function stage1to2(event) {
    //   event.preventDefault();
    //   firstContainer.classList.add("hidden");
    //   secondContainer.classList.remove("hidden");
    //   step1btn.classList.remove("lists-active");
    //   step2btn.classList.add("lists-active");
    // }
    // stagebtn1.addEventListener("click", stage1to2);


    // function stage2to1(event) {
    //   event.preventDefault();
    //   firstContainer.classList.remove("hidden");
    //   secondContainer.classList.add("hidden");
    //   step1btn.classList.add("lists-active");
    //   step2btn.classList.remove("lists-active");
    // }
    // stagebtn2a.addEventListener("click", stage2to1);

    // function stage2to3(event) {
    //   event.preventDefault();
    //   secondContainer.classList.add("hidden");
    //   thirdContainer.classList.remove("hidden");
    //   step2btn.classList.remove("lists-active");
    //   step3btn.classList.add("lists-active");
    // }
    // stagebtn2b.addEventListener("click", stage2to3);



    // function stage3to2(event) {
    //   event.preventDefault();
    //   secondContainer.classList.remove("hidden");
    //   thirdContainer.classList.add("hidden");
    //   step2btn.classList.add("lists-active");
    //   step3btn.classList.remove("lists-active");

    // }
    // stagebtn3a.addEventListener("click", stage3to2);


    // function stage3to4(event) {
    //   event.preventDefault();
    //   thirdContainer.classList.add("hidden");
    //   fourthContainer.classList.remove("hidden");
    //   step3btn.classList.remove("lists-active");
    //   step4btn.classList.add("lists-active");
    // }
    // stagebtn3b.addEventListener("click", stage3to4);

    // function stage4to3(event) {
    //   event.preventDefault();
    //   thirdContainer.classList.remove("hidden");
    //   fourthContainer.classList.add("hidden");
    //   step3btn.classList.add("lists-active");
    //   step4btn.classList.remove("lists-active");
    // }
    // stagebtn4a.addEventListener("click", stage4to3);


