export default function Table( {children, ...props} ) {
    return (<div className="relative rounded-xl overflow-auto"><div class="shadow-sm overflow-hidden my-8">
    <table className="border-collapse table-auto w-full text-sm">
        { children }
    </table>
    </div>
</div>);
}
