/* Navigation Search  */
let toggleSearch = document.querySelector("#navigation-search-hook");

toggleSearch.addEventListener('click', function() {
    var searchForm = document.getElementById("navigation-search-form");
    if (searchForm.style.display === "none") {
        searchForm.style.display = "block";
    } else {
        searchForm.style.display = "none";
    }
});

$(document).ready(function() {
    var limit = 8;
    $(".loadMoreContent .col").slice(0, limit).show();
    $("#loadMoreBtn").click(function(e) {
        e.preventDefault();
        $(".loadMoreContent .col:hidden").slice(0, limit - 4).slideDown("slow");
        if ($(".loadMoreContent .col:hidden").length == 0) {
            // $("#load_more").fadeOut("slow");
            $("#loadMoreBtn").text("No Content to Display").addClass("noContent");
        }
    });
});

$(document).ready(function() {
    var limitC = 9;
    $(".loadMoreContentCategory .col").slice(0, limitC).show();
    $("#loadMoreCategoryBtn").click(function(e) {
        e.preventDefault();
        $(".loadMoreContentCategory .col:hidden").slice(0, limitC - 3).slideDown("slow");
        if ($(".loadMoreContentCategory .col:hidden").length == 0) {
            // $("#load_more").fadeOut("slow");
            $("#loadMoreCategoryBtn").text("No Content to Display").addClass("noContent");
        }
    });
});


$(document).ready(function() {
    var tablestatus = 1;
    $("body").on("click", ".viewmore", function() {
        $(this).removeClass("viewmore").addClass("viewless");
        $(".facts tr").show();
        return false;
    });
    $("body").on("click", ".viewless", function() {
        $(this).removeClass("viewless").addClass("viewmore");
        $(".facts tr:nth-child(n+4)").hide();
        $(".facts tr:last-child").attr("style", "display:table-row");
        return false;
    });
});


$("#blog_biography_toggle").click(function() {
    if ($(this).text() === "[hide]") {
        $(this).text("[show]");
    } else {
        $(this).text("[hide]");
    }
    $(".blog-biography-tab-header-list").toggle(300);
});


$('#singleSidebar').stickySidebar({
    innerWrapperSelector: '.sidebar-inner',
    topSpacing: 20,
    bottomSpacing: 20,
    resizeSensor: true,
});

$('#leftSidebar').stickySidebar({
    innerWrapperSelector: '.sidebar-inner',
    topSpacing: 20,
    bottomSpacing: 20,
    // resizeSensor: true,
});

$('#rightSidebar').stickySidebar({
    innerWrapperSelector: '.sidebar-inner',
    topSpacing: 20,
    bottomSpacing: 20,
    resizeSensor: true,
});