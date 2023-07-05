export function Textarea({ className, disabled, value, ...props }) {
	return <textarea {...props} disabled={ disabled ? 'disabled' : '' } className={'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '+className}>{value}</textarea>
}

export function Select({ className, disabled, children, ...props }) {
	return <select {...props} x-init="$el.value=$el.getAttribute('value')" disabled={ disabled ? 'disabled' : '' } className={'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '+className}>
{children}
</select>
}

export function Label({ className, children, ...props }) {
	return <label {...props} className={'block font-medium text-sm text-gray-700 '+className }>
	    {children}
	</label>
}

export function Error({ messages, className, ...props }) {
	if (messages) {
	    return <ul className={'text-sm text-red-600 space-y-1' +className}>
	        {messages.map( ( message) => (
	            <li>{ message }</li>
	        ) )}
	        
	    </ul>
	}

	return '';
}

export function Input({ disabled, className, ...props }) {
	return (<input {...props} disabled={ disabled ? 'disabled' : '' } className={'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm '+className } />);

}