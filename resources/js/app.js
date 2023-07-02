import './bootstrap';
import '../css/quill.snow.css';
import hljs from 'highlight.js';
import 'highlight.js/styles/github.css';

import Alpine from 'alpinejs';
import Quill from 'quill';
import ChoicesJs from 'choices.js';
import 'choices.js/public/assets/styles/choices.min.css';

window.Alpine = Alpine;
Alpine.start();

hljs.configure({   // optionally configure hljs
  languages: ['javascript', 'ruby', 'python', 'php']
});

$(".search textarea").removeClass('quill');

$(".search input[type='file']").each(function() {
	this.remove();
});

var toolbarOptions = [
  [ 'bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],
  ['image', 'video'],
  ['clean']                                         // remove formatting button
];

function imageHandler() {
    var range = this.quill.getSelection();
    var value = prompt('What is the image URL');
    if(value){
        this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
    }
}

$('.quill').each(function() {
	let editor = document.createElement('div');

	this.parentElement.insertBefore(editor, this);

	let quill = new Quill(editor, {

		modules: {
			syntax: {
			  highlight: (text) => hljs.highlightAuto(text).value,
			},
			toolbar: {
                container: toolbarOptions,
                handlers: {
                    image: imageHandler
                }
            }
		},
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

function debounce(func, timeout = 300){
  let timer;
  return (...args) => {
    clearTimeout(timer);
    timer = setTimeout(() => { func.apply(this, args); }, timeout);
  };
}

//working on ajax 
NodeList.prototype.ChoicesJs = function( cls ) {
	return this.each(function() {
		let ch = new ChoicesJs( this, $(this).data() );

	});
}

$(".choicesjs").ChoicesJs();

$(".search h1").click(function() {
	$(this).next().toggleClass('hidden');
});

let submitHandler;
$(".delete").submit( submitHandler = function( e ) {
	e.preventDefault();
	$("#modal").removeClass('hidden');
	$("#modal").data('elm', $(this) );
});

$("#modal #yes").click(function() {
	let elm = $("#modal").data('elm');
	elm[0].removeEventListener( "submit", submitHandler );
	elm[0].submit();
});

$("#modal #no").click(function() {
	$("#modal").addClass('hidden');
});