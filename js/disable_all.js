$(document).on("keydown", disable);
$(document).mousedown(function(e) {
	if (e.which==3) {
		alert('Right click not allowed..!');
		e.preventDefault();
    }
});

function disable(e) 
{ 
    //166==f5  123==f12  65==a  67==c 82==r 83==s 85==u 86==v 90==z 73==i 74==j
    if ((e.keyCode == 116) || (e.keyCode == 123) || (e.keyCode == 82 && e.ctrlKey) || (e.keyCode == 83 && e.ctrlKey) || (e.keyCode == 65 && e.ctrlKey) ||  (e.keyCode == 85 && e.ctrlKey) || (e.keyCode == 86 && e.ctrlKey) || (e.keyCode == 90 && e.ctrlKey) || (e.keyCode == 67 && e.ctrlKey) || (e.ctrlKey && e.shiftKey && e.keyCode == 73) || (e.ctrlKey && e.shiftKey && e.keyCode == 74) )        
    {
        e.preventDefault();
    }  
};
