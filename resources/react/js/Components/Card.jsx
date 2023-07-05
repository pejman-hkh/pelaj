export default function Card( {title = '', className = '', children, ...props } ) {
    return (
    <div  {...props} className={'w-full mx-auto space-y-6 mb-4 '+ className }>
        <div className="bg-white shadow sm:rounded-lg">
            { title ? <h1 className="p-3 sm:p-3 border-solid border-0 border-b border-slate-300">{title}</h1> : ''}
            <div className="p-4 sm:p-8 {{ $bodyClass }}">
            {children}
            </div>
        </div>
    </div>)
}