//https://github.com/pejman-hkh/nodelist/

NodeList.prototype.item = function item(i) {
    return this[+i || 0];
};

function _nodeList( arr ) {
	return Reflect.construct(Array, arr, NodeList)
}

document.querySelectorAllA = document.querySelectorAll;

function $( selector ) {
	if( typeof selector == 'object' ) {
		return _nodeList( [ selector ] );
	}

	return document.querySelectorAllA( selector );
}

window.$ = $;
window._nodeList = _nodeList;

NodeList.prototype.each = function( callback ) {
	this.forEach(function( elm, index ) {
		callback.call(elm, elm, index );
	});
	return this;
};

["focusin", "focusout", "load", "beforeunload", "unload", "change", "click", "dblclick", "focus", "blur", "reset", "submit", "resize", "scroll", "mouseover", "mouseout", "mouseup", "mousedown", "mouseenter", "mousemove", "mouseleave", "contextmenu", "wheel", "keydown", "keypress", "keyup", "select" ].forEach(function( name, index ) {

	NodeList.prototype[ name ] = function( callback ) {
		this.each(function( elm, index ) {
			this.addEventListener( name, callback );
		});
		return this;
	}

});


NodeList.prototype.prev = function() {
	return _nodeList( [ this[0].previousElementSibling ] );
}

NodeList.prototype.next = function() {
	return _nodeList( [ this[0].nextElementSibling ] );
}

NodeList.prototype.find = function( val ) {
	var nl = [];
	this.each(function() {
		var pselect = this.querySelectorAll(val);
		for( var x in pselect ) {
			if( typeof pselect[x] === 'object' )
				nl.push(pselect[x]);
		}
	});
	return _nodeList(nl);
};

NodeList.prototype.attr = function( key, value ){
	if( typeof val === 'undefined' ) {
		return this[0].getAttribute( key );
	} else {
		return this.each(function() {
			this.setAttribute( key, value );
		});
	}
};

NodeList.prototype.val = function( val ) {
	if( typeof val === 'undefined' ) {
		return this[0].value;
	}

	return this.each(function() {
		this.value = val;
	});
}

NodeList.prototype.html = function( val ) {
	if( typeof val === 'undefined' ) {
		return this[0].innerHTML;
	}

	return this.each(function() {
		this.innerHTML = val;
	});
}

NodeList.prototype.addClass = function( name ) {
	return this.each(function() {
		this.classList.add( name );
	});
}

NodeList.prototype.removeClass = function( name ) {
	return this.each(function() {
		this.classList.remove( name );
	});
}


NodeList.prototype.data = function( key, val ) {
	if( typeof val === 'undefined' ) {
		let ret;
		this.each(function() {
			if( typeof this.dataset1 === 'undefined' )
				this.dataset1 = {};
			ret = this.dataset1[key];
		});

		return ret;
	}

	return this.each(function() {
		if( typeof this.dataset1 === 'undefined' )
			this.dataset1 = {};
		this.dataset1[key] = val
	});
}

export default $;