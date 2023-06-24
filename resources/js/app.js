import './bootstrap';
import '../css/quill.snow.css';

import Alpine from 'alpinejs';
import Quill from 'quill';

window.Alpine = Alpine;
Alpine.start();

$('.quill').each(function() {
	let editor = document.createElement('div');

	this.parentElement.insertBefore(editor, this);

	let quill = new Quill(editor, {
		theme: 'snow'
	});

	$(this).data('quill', quill );
	$(this).addClass('hidden');
});

$("form").submit(function() {
	$('.quill').each(function() {
		$(this).val( $(this).prev().find(".ql-editor").html() );
	});
});


if( typeof formJsonData !== 'undefined' ) {
	for( let x in formJsonData) {
        let val = formJsonData[x];
        let elm = $("form [name='"+x+"']");
        if( elm.length > 0 ) {
	        elm.val(val);
	        let quill;
	        if( quill = elm.data('quill') ) {
				quill.pasteHTML( val );
	        }
        }
    }
}

NodeList.prototype.toggleClass = function( cls ) {
	return this.each(function() {
		this.classList.toggle(cls);
	});
}

$(".search h1").click(function() {
	$(this).next().toggleClass('hidden');
});