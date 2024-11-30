const MENU_BOX = document.getElementsByClassName("container")[0];
const MENU = document.getElementsByTagName("nav")[0];
const BRK_POINTS = document.querySelectorAll(".breakpoint");
const SCROLL_DISTANCES = [];
const LINKS = Array.from(document.getElementsByClassName("menu_link"));

function debounce(func, delay = 40) {
	let timer;
	return function() {
		let context = this;
		let args = arguments;
		let functionToDelay = function() {
			func.apply(context, args);
		}
		clearTimeout(timer);
		timer = setTimeout(functionToDelay, delay);
	};
}

function fixMenu() {
	let scrolling = window.pageYOffset || document.documentElement.scrollTop;
	
	if (scrolling > MENU_BOX.scrollHeight) {
		if (!MENU_BOX.classList.contains("fixed_menu")) {
			MENU_BOX.classList.add("fixed_menu");
		}
	} else {
		MENU_BOX.classList.remove("fixed_menu");
	}
}

function getDistanceFromDocumentTop(elem) {
        let location = 0;
        if (elem.offsetParent) {
            do {
                location += elem.offsetTop;
                elem = elem.offsetParent;
            } while (elem);
        }
        return location;
}

function getBreakPoints() {
	SCROLL_DISTANCES.length = 0; 
	
    BRK_POINTS.forEach(elem => {
        let targetId = elem.id;
        let distance = getDistanceFromDocumentTop(elem);
        let obj = {};
        obj.id = targetId;
        obj.position = distance;    
        SCROLL_DISTANCES.push(obj);
    });
}

getBreakPoints();

function cleanUpMenu() {
    LINKS.forEach(elem => {
        if (elem.classList.contains("active")) {
            elem.classList.remove("active");
        }
    }); 
}

function activateMenuOnScroll() {
    let scrollDistance = window.pageYOffset;
    let scrollLength = scrollDistance + window.innerHeight;
	let totalHeight = document.body.offsetHeight;
	let navHeight = document.querySelector("header .container").offsetHeight;
	let section = document.getElementsByTagName("section")[0];
	let sectionStyles = section.currentStyle || window.getComputedStyle(section);
	let margin = parseInt(sectionStyles.marginTop.replace(/[^0-9]/g, ""), 10);

    cleanUpMenu();
    
  if (scrollDistance < SCROLL_DISTANCES[0].position - navHeight - margin || scrollDistance === 0) {
        LINKS[0].classList.add("active");
        return;
    }  else if (scrollLength >= totalHeight) {
        LINKS[LINKS.length - 3].classList.add("active");
        return;
    }
    
    SCROLL_DISTANCES.forEach(elem => {
        if (scrollDistance >= elem.position - (navHeight + margin)) {
            cleanUpMenu();
			
            let currentLink = "#" + elem.id;
            let currentNavElem = LINKS.find(x => x.getAttribute("href") === currentLink);
            currentNavElem.classList.add("active");
        }
    });
}

window.addEventListener("scroll", debounce(fixMenu));
// window.addEventListener("resize", debounce(getBreakPoints, 500));
window.addEventListener("scroll", debounce(activateMenuOnScroll));