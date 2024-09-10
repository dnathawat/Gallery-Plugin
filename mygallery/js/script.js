document.addEventListener('DOMContentLoaded', function () {
	// Initialize slider (basic implementation)
	let currentIndex = 0;
	const items = document.querySelectorAll('.slider-item');
	const totalItems = items.length;

	function showSlide(index) {
		items.forEach((item, i) => {
			item.style.transform = `translateX(-${index * 100}%)`;
		});
	}

	setInterval(() => {
		currentIndex = (currentIndex + 1) % totalItems;
		showSlide(currentIndex);
	}, 3000); // Change slide every 3 seconds

	// Popup functionality
	const popup = document.createElement('div');
	popup.className = 'popup';
	document.body.appendChild(popup);

	document.querySelectorAll('.popup-link').forEach(link => {
		link.addEventListener('click', function (event) {
			event.preventDefault();
			const imgSrc = this.href;
			popup.innerHTML = `<img src="${imgSrc}" alt="Popup Image" />`;
			popup.classList.add('active');
		});
	});

	popup.addEventListener('click', function () {
		this.classList.remove('active');
	});
});