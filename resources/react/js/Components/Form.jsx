export function Textarea({ ...props }) {
	return <textarea {...props} className={'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '+props.className}>{props.value}</textarea>
}

export function Select({ children, ...props }) {
	return <select {...props} x-init="$el.value=$el.getAttribute('value')" className={'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '+props.className}>
{children}
</select>
}

export function Label({ children, ...props }) {
	return <label {...props} className={'block font-medium text-sm text-gray-700 '+props.className }>
	    {children?children:props.value}
	</label>
}

export function Error({ messages, ...props }) {
	if (messages) {
	    return <ul className={'text-sm text-red-600 space-y-1' +props.className}>
	        {messages.map( ( message) => (
	            <li>{ message }</li>
	        ) )}
	        
	    </ul>
	}

	return '';
}

export function Input({ ...props }) {
	return (<input {...props} className={'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '+props.className } />);

}