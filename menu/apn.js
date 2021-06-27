const kadalbunting = document.querySelector("#kadalbunting");
const hero = document.querySelector("bg-cl");

const tl = new TimelineMax();

tl.fromTo(kadalbunting,1, {height: "0%"}, {height: "80%", ease: Power2.easeInOut })
.fromTo(headline, 0.5, 
	{opacity: 0, x: 30}, 
	{opacity: 1, x: 0}, "-=0.5")