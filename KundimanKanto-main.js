// for error
function showTooltip(message) {

    const tooltip = document.createElement('div');
    tooltip.textContent = message;
    tooltip.style.position = 'fixed';
    tooltip.style.top = '50%';
    tooltip.style.left = '50%';
    tooltip.style.transform = 'translateX(-50%)';
    tooltip.style.backgroundColor = 'rgba(255, 0, 0, 0.8)'; 
    tooltip.style.color = '#fff'; 
    tooltip.style.padding = '30px 20px';
    tooltip.style.borderRadius = '5px';
    tooltip.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.3)';
    tooltip.style.fontSize = '20px';
    tooltip.style.fontFamily = 'Sono, sans-serif';
    tooltip.style.zIndex = '9999'; 


    document.body.appendChild(tooltip);


    setTimeout(() => {
        tooltip.remove();
    }, 3000);
}