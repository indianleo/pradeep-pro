import React, { useState } from 'react';
import { DataGrid } from '@material-ui/data-grid';
import SidePan from './SidePan';
import AddNewCollegeForm from './AddNewCollegeForm';

const College = (props) => {
    // const [collegeName, setCollegeName] = useState(false);
    const [open, setOpen] = useState(false);
    const columns = [
        { field: 'id', headerName: 'ID', width: 70 },
        { field: 'college_name', headerName: 'College name', width: 200, type: 'number', },
        { field: 'no_of_student', headerName: 'No. of student', width: 200, type: 'number', },
        {
            field: 'max_allowed',
            headerName: 'Max Allowed',
            type: 'number',
            width: 200,
        },
    ];

    const showFormPopup = () => {
        setOpen(true);
    }

    const rows = [
        { id: 1, no_of_student: 200, college_name: 'IICS', max_allowed: 100 },
        { id: 2, no_of_student: 250, college_name: 'KATYAYNI', max_allowed: 120 },
        { id: 3, no_of_student: 750, college_name: 'UNITED', max_allowed: 300 },
        { id: 4, no_of_student: 930, college_name: 'AU', max_allowed: 350 },
        { id: 5, no_of_student: 1153, college_name: 'BHU', max_allowed: 500 },
        { id: 6, no_of_student: 630, college_name: 'AGRICULTURE', max_allowed: 250 },
        { id: 7, no_of_student: 550, college_name: 'SAMBHU NATH', max_allowed: 150 },
        { id: 8, no_of_student: 0, college_name: null, max_allowed: 0 },
        { id: 9, no_of_student: 100, college_name: 'SHAKTI', max_allowed: 50 },
    ];
    return (
        <div className="container">
            {open &&
                <AddNewCollegeForm
                    open={open}
                    onClose={setOpen}
                />}
            <div className="row">
                <div style={{ textAlign: 'right' }} onClick={() => { showFormPopup() }}>Add New College</div>
                <div className="col-sm-3"><SidePan /></div>
                <div className="col-sm-11 offset-2 mt-2">
                    <div style={{ height: 400, width: '100%' }}>
                        <DataGrid rows={rows} columns={columns} pageSize={5} checkboxSelection />
                    </div>
                </div>
            </div>
        </div >
    );
};

export default College;
