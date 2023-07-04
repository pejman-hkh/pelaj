export function Link({ className = '', children, ...props }) {
    return (
        <a
            {...props}
            className={
                'rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 ' +
                className
            }
        >
        {children}
        </a>
    );
}

export default Link;