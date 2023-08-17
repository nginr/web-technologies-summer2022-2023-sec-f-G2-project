let tabButtons = document.querySelectorAll('.tabcontainer .buttonscontainer button');
let tabPanels = document.querySelectorAll('.tabcontainer .tabpanel');

function showpanel(panelIDX) {
    tabButtons.forEach(function(node) {
        node.style.backgroundColor='';
        node.style.color='';
    });
    tabButtons[panelIDX].style.backgroundColor = "#11101b";
    tabButtons[panelIDX].style.color = "#fefefe";
    tabPanels.forEach(function(node) {
        node.style.display = 'none';
    });
    tabPanels[panelIDX].style.display = 'block';
    tabPanels[panelIDX].style.border = '1px solid #11101b';
}

window.onload = function () {
    showpanel(1);
};
