function goToStep(stepNumber) {
    $("#stepperTabs .nav-link").removeClass("active");
    $("#stepperTabs .nav-link")
        .eq(stepNumber - 1)
        .addClass("active")
        .tab("show");
}
