import { Label, Input, Error, Textarea, Select, Upload } from '../../Components/Form.jsx';

function Fields({ column, model, editorColumns, ...props }) {
	if(  column[0] == 'id' )
		return '';

	let errors = { get : function() {}};

	console.log( column[1] );

	let ret;
    if( column[0] == 'file') {
        ret = <div className="mb-4">
            <Label for={ column[0] } value={__( ucfirst(column[0]) )} />
            <Upload id={ column[0] } className="block mt-1 w-full" type="text" name={ column[0]+'[]' } />
            <Error messages={errors.get( column[0] )} className="mt-2" />
        </div>            
    } else if( column[1] == 'string') {
        ret = <div className="mb-4">
            <Label for={ column[0] } value={__( ucfirst(column[0]) ) } />
            <Input id={ column[0] } className="block mt-1 w-full" type="text" name={ column[0] } />
            <Error messages={errors.get( column[0] )} className="mt-2" />
        </div>
    } else if ( column[1] == 'text' ) {
        ret = (<div className="mb-4">
            <Label for={ column[0] } value={__( ucfirst(column[0]) )} />
            <Textarea id={ column[0] } className={ ( editorColumns?.includes( column[0] )?'quill':'')+' block mt-1 w-full' } name={ column[0] } />
            <Error messages={errors.get( column[0] )} className="mt-2" />
        </div>)
    } else if ( column[1] == 'integer' || column[2] == 'tinyint' ) {
        let arr = column[0]+'Array';
        let b;
        if ( model[arr] ) {
	        b = <Select id={column[0]} className="block mt-1 w-full" type="text" name={column[0]}>
	            <option value="">Select</option>
	            @foreach( (array)@model->arr as key => val )
	            <option value={ key }>{ key } - { val }</option>
	            @endforeach
	        </Select>
        } else {
	        b = (<><Input id={ column[0] } className="block mt-1 w-full" type="text" name={ column[0] } />
	        <Error messages={errors.get( column[0] )} className="mt-2" /></>);               
        }
	    ret = <div className="mb-4">
	        <Label for={column[0]} value={__( ucfirst(column[0])) } />
	  		{b}
	        <Error messages={errors.get( column[0] )} className="mt-2" />
	    </div>
	}

	return ret;

}

export default function Form({columns, model}) {

	let i = 0;
	return (<div>
	{columns.map(column => (
		<Fields key={i++} { ...{ column, model } } />
	))}
	</div>);

}