import AuthenticatedLayout from '../Layouts/AuthenticatedLayout';
import Card from '../Components/Card';
import Primarybutton from '../Components/Button';
import Form from './Manager/Form';
import { Table, Thead, Tbody, Tr, Th, Td } from '../Components/Table';
//import { Head } from '@inertiajs/react';

function Columns( {mcolumn, list} ) {
    let column = mcolumn[0];
    let ct = column+'Title';
    let cl = column.substr( 0, -3 )

    let ret;
    if ( column.substr( -3 ) == '_id' ) {
        ret = <a href={ list[cl]?.listLink?list[cl].listLink:(route('/')+'manager/index/'+ucfirst(cl)+'?id='+list[cl]?.id) }>{ list[cl]?.listTitle?list[cl].listTitle:list[cl]?.title }</a>
    } else if( list && list[ct] ) {
        if( Array.isArray( list[ct] ) )
            ret = list[ct].join('')
        else
            ret = list[ct]
    } else {
        ret = list[column]    
    }

    return (<><Td key={list.id+column[0]}>{ret}</Td></>)
}

export default function Manager({ data }) {
    let columns = Object.values(data.columns);
    let model = Object.values(data.model);
    return (
        <AuthenticatedLayout
            user={data.auth.user}
            menu={data.modelsMenu}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">{data.modelName} lists</h2>}
        >
  
            <Card title="Search" bodyclassName="'hidden'" className="search">
                <form>
                    <Form { ...{ columns, model } } />
         
                    <div className="flex items-center justify-end mt-4">
                        <Primarybutton className="ml-3">
                            Search
                        </Primarybutton>
                    </div>            

                </form>
         
            </Card>

           <Card>
                   <a href={ route('/')+'manager/create/'+data.modelName}>  <Primarybutton className="my-4">{ 'New '+data.modelName } </Primarybutton></a>

                    {data.listTasks.map( task => 
                        <a href={ route('/')+'manager/index/'+data.modelName+'?task='+task[1] }>  <Primarybutton className="my-4">{task[0]} </Primarybutton></a>
                    )}
                
                    <Table>
                        <Thead>
                            <Tr>
                            {Object.values(data.columns).map( column  =>
                            <Th key={column[0]}>{ __( ucfirst(column[0]) ) }</Th>
                            )}
                            <Th>
                                { __('Edit') }
                            </Th>
                            </Tr>
                        </Thead>
                      <Tbody>
                       {data.lists.data.map( list  =>
                        <Tr key={list.id}>
                            {Object.values(data.columns).map( mcolumn  => 
                                <Columns { ...{ mcolumn, list } } />
                            )}
                            <Td>Edit</Td>                        
                        </Tr>
                        )}
                        </Tbody>
                    </Table>

           </Card>
           

        </AuthenticatedLayout>
    );
}
