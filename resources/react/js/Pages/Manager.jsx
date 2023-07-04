import AuthenticatedLayout from '../Layouts/AuthenticatedLayout';
import Card from '../Components/Card';
import Table from '../Components/Table';
//import { Head } from '@inertiajs/react';

function Columns( {mcolumn, list} ) {
    let column = mcolumn[0];
    let ct = column+'Title';
    let cl = column.substr( 0, -3 )

    let ret;
    if ( column.substr( -3 ) == '_id' ) {
        ret = <a href={ list[cl]?.listLink?list[cl].listLink:('/manager/index/'+ucfirst(cl)+'?id='+list[cl]?.id) }>{ list[cl]?.listTitle?list[cl].listTitle:list[cl]?.title }</a>
    } else if( list && list[ct] ) {
        if( Array.isArray( list[ct] ) )
            ret = list[ct].join('')
        else
            ret = list[ct]
    } else {
        ret = list[column]    
    }

    return (<><td key={list.id+column[0]}>{ret}</td></>)
}

export default function Manager({ data }) {

    return (
        <AuthenticatedLayout
            user={data.auth.user}
            menu={data.modelsMenu}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
           
            <x-slot name="header">
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    {data.modelName} lists
                </h2>
            </x-slot>

            <Card title="Search" bodyclassName="'hidden'" className="search">
                <form>
                    <x-formManager />
         
                    <div className="flex items-center justify-end mt-4">
                        <x-primary-button className="ml-3">
                            Search
                        </x-primary-button>
                    </div>            

                </form>
         
            </Card>

           <Card>
                   <a href={'manager/create/'+data.modelName}>  <x-primary-button className="my-4">{ 'New '+data.modelName } </x-primary-button></a>

                    {data.listTasks.map( task => 
                        <a href={ '/manager/index/'+data.modelName+'?task='+task[1] }>  <x-primary-button className="my-4">{task[0]} </x-primary-button></a>
                    )}
                
                    <Table>
                        <thead>
                            <tr>
                            {Object.values(data.columns).map( column  =>
                            <th key={column[0]}>{ __( ucfirst(column[0]) ) }</th>
                            )}
                            <th>
                                { __('Edit') }
                            </th>
                            </tr>
                        </thead>
                      <tbody>
                       {data.lists.data.map( list  =>
                        <tr key={list.id}>
                            {Object.values(data.columns).map( mcolumn  => 
                                <Columns { ...{ mcolumn, list } } />
                            )}
                            <td>Edit</td>                        
                        </tr>
                        )}
                        </tbody>
                    </Table>

           </Card>
           

        </AuthenticatedLayout>
    );
}
