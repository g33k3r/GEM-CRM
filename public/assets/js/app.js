// Window scroll function for navbar sticky behavior
function windowScroll() {
    var navbar = document.getElementById("navbar-custom");
    if (50 <= document.body.scrollTop || 50 <= document.documentElement.scrollTop) {
        navbar?.classList.add("nav-sticky");
    } else {
        navbar?.classList.remove("nav-sticky");
    }
}

// Initialize Feather icons
feather.replace();

// Add scroll event listener
window.addEventListener("scroll", function(e) {
    e.preventDefault();
    windowScroll();
});

// Tab menu functionality
var triggerTabList = [].slice.call(document.querySelectorAll("#tab-menu a"));
var collapses = document.querySelectorAll(".navbar-nav .collapse");

triggerTabList.forEach(function(tab) {
    var tabInstance = new bootstrap.Tab(tab);
    tab.addEventListener("click", function(e) {
        e.preventDefault();
        tabInstance.show();
        document.body.classList.remove("enlarge-menu");
    });
});

// Collapse functionality
collapses.forEach(function(collapse) {
    var collapseInstance = new bootstrap.Collapse(collapse, {
        toggle: false
    });

    collapse.addEventListener("show.bs.collapse", function(e) {
        e.stopPropagation();
        var parentCollapse = collapse.parentElement.closest(".collapse");
        if (parentCollapse != null) {
            parentCollapse.querySelectorAll(".collapse").forEach(function(c) {
                var cInstance = bootstrap.Collapse.getInstance(c);
                if (cInstance !== collapseInstance) {
                    cInstance.hide();
                }
            });
        }
    });

    collapse.addEventListener("hide.bs.collapse", function(e) {
        e.stopPropagation();
        collapse.querySelectorAll(".collapse").forEach(function(c) {
            bootstrap.Collapse.getInstance(c).hide();
        });
    });
});

// Toggle menu button
try {
    document.getElementById("togglemenu").addEventListener("click", function(e) {
        e.preventDefault();
        document.body.classList.toggle("enlarge-menu");
    });
} catch (e) {}

// Responsive menu handling
if (window.screen.width < 1025) {
    document.getElementsByTagName("body")[0].classList.add("enlarge-menu", "enlarge-menu-all");
} else if (window.screen.width < 1340) {
    document.getElementsByTagName("body")[0].classList.remove("enlarge-menu-all");
    document.getElementsByTagName("body")[0].classList.add("enlarge-menu");
}

window.addEventListener("resize", function() {
    if (window.screen.width < 1025) {
        document.getElementsByTagName("body")[0].classList.add("enlarge-menu", "enlarge-menu-all");
    } else if (window.screen.width < 1340) {
        document.getElementsByTagName("body")[0].classList.remove("enlarge-menu-all");
        document.getElementsByTagName("body")[0].classList.add("enlarge-menu");
    }
});

// Leftbar tab menu active state
document.querySelectorAll(".leftbar-tab-menu a").forEach(function(link, index) {
    var currentUrl = window.location.href.split(/[?#]/)[0];
    if (link.href == currentUrl) {
        link.classList.add("active");
        
        if (!link.parentElement.parentElement.classList.contains("navbar-nav")) {
            var collapse = link.closest(".collapse");
            if (collapse) {
                collapse.classList.add("show");
                var parentLink = collapse.parentElement.querySelector("a");
                parentLink.classList.remove("collapsed");
                parentLink.setAttribute("aria-expanded", "true");
                
                var parentCollapse = collapse.parentElement.closest(".collapse");
                if (parentCollapse) {
                    parentCollapse.classList.add("show");
                    parentCollapse.parentElement.querySelector("a").classList.remove("collapsed");
                    parentCollapse.parentElement.childNodes[1].setAttribute("aria-expanded", "true");
                }
            }
        }
        
        var tabPane = link.closest(".tab-pane");
        if (tabPane) {
            tabPane.classList.add("active");
            document.querySelectorAll("a").forEach(function(a) {
                if (a.href.includes(tabPane.id)) {
                    a.classList.add("active");
                }
            });
        }
    }
});

// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function(element) {
    return new bootstrap.Tooltip(element);
});

// Dropdown functionality
var dropdowns = document.querySelectorAll(".dropup, .dropend, .dropdown, .dropstart");
var events = ["click"];

function toggleDropdown(e, dropdown) {
    var dropdownMenu = dropdown.closest(".dropdown-menu");
    if (dropdownMenu) {
        e.preventDefault();
        e.stopPropagation();
        var menu = dropdown.querySelector(".dropdown-menu");
        var allMenus = dropdownMenu.querySelectorAll(".dropdown-menu");
        [].forEach.call(allMenus, function(m) {
            if (m !== menu) {
                m.classList.remove("show");
            }
        });
        menu.classList.add("show");
    }
}

// Fixed: Added null check to prevent error
function hideDropdowns(dropdown) {
    var dropdownMenu = dropdown.querySelector(".dropdown-menu");
    if (dropdownMenu) {
        var nestedMenus = dropdownMenu.querySelectorAll(".dropdown-menu");
        if (nestedMenus) {
            [].forEach.call(nestedMenus, function(menu) {
                menu.classList.remove("show");
            });
        }
    }
}

function toggleMenu() {
    document.getElementById("mobileToggle").classList.toggle("open");
    var navigation = document.getElementById("navigation");
    if (navigation.style.display === "block") {
        navigation.style.display = "none";
    } else {
        navigation.style.display = "block";
    }
}

function activateMenu() {
    var subMenuItems = document.getElementsByClassName("sub-menu-item");
    if (subMenuItems) {
        var activeItem = null;
        for (var i = 0; i < subMenuItems.length; i++) {
            if (subMenuItems[i].href === window.location.href) {
                activeItem = subMenuItems[i];
                break;
            }
        }
        
        if (activeItem) {
            activeItem.classList.add("active");
            var listItem = getClosest(activeItem, "li");
            if (listItem) {
                listItem.classList.add("active");
            }
            
            var parentMenu = getClosest(activeItem, ".parent-menu-item");
            if (parentMenu) {
                parentMenu.classList.add("active");
                var menuItem = parentMenu.querySelector(".menu-item");
                if (menuItem) {
                    menuItem.classList.add("active");
                }
                var parentParentMenu = getClosest(parentMenu, ".parent-parent-menu-item");
                if (parentParentMenu) {
                    parentParentMenu.classList.add("active");
                }
            } else {
                var parentParentMenu = getClosest(activeItem, ".parent-parent-menu-item");
                if (parentParentMenu) {
                    parentParentMenu.classList.add("active");
                }
            }
        }
    }
}

// Setup dropdown event listeners
[].forEach.call(dropdowns, function(dropdown) {
    var toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
    if (toggle) {
        toggle.addEventListener(events[0], function(e) {
            toggleDropdown(e, dropdown);
        });
    } else {
        hideDropdowns(dropdown);
    }
});

// Menu body active state
document.querySelectorAll(".menu-body a").forEach(function(link, index) {
    var currentUrl = window.location.href.split(/[?#]/)[0];
    const linkElement = link;
    if (link.href == currentUrl) {
        linkElement.classList.add("active");
        linkElement.parentNode.classList.add("menuitem-active");
        linkElement.parentNode.querySelector(".nav-link")?.setAttribute("aria-expanded", "true");
        linkElement.parentNode.parentNode.parentNode.classList.add("show");
        linkElement.parentNode.parentNode.parentNode.parentNode.classList.add("menuitem-active");
        linkElement.parentNode.parentNode.parentNode.parentNode.querySelector(".nav-link")?.setAttribute("aria-expanded", "true");
        
        var parent6 = linkElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        if (parent6.getAttribute("id") !== "sidebar-menu") {
            parent6.classList.add("show");
        }
        
        linkElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("menuitem-active");
        linkElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(".nav-link")?.setAttribute("aria-expanded", "true");
        
        var parent9 = linkElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
        if (parent9 && parent9 instanceof HTMLElement && parent9.getAttribute("id") !== "wrapper") {
            parent9.classList.add("show");
        }
        
        var parent10 = parent9 && parent9.parentNode;
        if (parent10) {
            parent10.classList.add("menuitem-active");
        }
    }
});

// Navigation active state
if (document.querySelectorAll("#navigation").length) {
    document.querySelectorAll("#navigation li a").forEach(function(link, index) {
        var currentUrl = window.location.href.split(/[?#]/)[0];
        if (link.href == currentUrl) {
            const linkElement = link;
            linkElement.classList.add("active");
            
            var ariaLabelledBy = linkElement.getAttribute("aria-labelledby");
            while (ariaLabelledBy) {
                var element = document.querySelector("#" + ariaLabelledBy);
                if (element) {
                    element.classList.add("active");
                    ariaLabelledBy = element.getAttribute("aria-labelledby");
                    element.setAttribute("aria-expanded", "true");
                }
                if (!ariaLabelledBy) break;
            }
            
            linkElement.parentNode.parentNode.classList.add("active");
            linkElement.parentNode.parentNode.parentElement.querySelector(".nav-link")?.classList.add("active");
            linkElement.parentNode.parentNode.parentNode.parentNode.classList.add("active");
            linkElement.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.classList.add("active");
        }
    });
    
    var navbarToggle = document.querySelector(".navbar-toggle");
    if (navbarToggle) {
        navbarToggle.addEventListener("click", function(e) {
            e.target.classList.toggle("open");
        });
    }
}
