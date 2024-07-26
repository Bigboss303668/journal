var urlParams = new URLSearchParams(window.location.search);
    var category = urlParams.get("category");

    if (!category) {
        urlParams.set("category", "All");

    window.location.href = "events.asp?" + urlParams.toString();
}