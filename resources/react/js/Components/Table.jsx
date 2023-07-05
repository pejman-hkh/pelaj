export function Td( { children, ...props }) {
    return (<><td className="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{children}</td></>);
}

export function Th( { children, ...props }) {
    return (<><th className="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">{children}</th></>);
}

export function Tr( { children, ...props }) {
    return (<><tr>{children}</tr></>);
}

export function Thead( { children, ...props }) {
    return (<><thead>{children}</thead></>);
}

export function Tbody( { children, ...props }) {
    return (<><tbody>{children}</tbody></>);
}

export function Table( {children, ...props} ) {
    return (<div className="relative rounded-xl overflow-auto"><div className="shadow-sm overflow-hidden my-8">
    <table className="border-collapse table-auto w-full text-sm">
        { children }
    </table>
    </div>
</div>);
}

export default Table;