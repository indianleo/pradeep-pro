import React from 'react';
import Modal from 'react-bootstrap/Modal';
import './SidePan.css'

const AddNewCollegeForm = (props) => {

    return (
        <div>

            <Modal
                show={props.open}
                onHide={props.setOpen}
                backdrop="static"
                keyboard={false}
                size="sm"
                className="collegemodalpopup"
            >
                <Modal.Header closeButton className="collegeheader">
                    <Modal.Title className="" style={{ paddingTop: '0px' }}>
                        <span>Add New College</span>
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body className="collegebody">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-12">
                                <div className="row">
                                    <div className="form-group col-md-6">
                                        <label for="" className="">
                                            College Name
                                        </label>
                                        <input type="text" className="form-control mt-1" placeholder="College Name" />
                                    </div>
                                    <div className="form-group col-md-6">
                                        <label for="" className="">
                                            User ID
                                        </label>
                                        <input type="text" className="form-control mt-1" placeholder="User ID" />
                                    </div>
                                    <div className="form-group col-md-6">
                                        <label for="" className="">
                                            Password
                                        </label>
                                        <input type="password" className="form-control mt-1" placeholder="Password" />
                                    </div>
                                    <div className="form-group col-md-6">
                                        <label for="" className="">
                                            Owner
                                        </label>
                                        <input type="text" className="form-control mt-1" placeholder="Owner" />
                                    </div>
                                    <div className="form-group col-md-12">
                                        <label for="" className="">
                                            Site URL
                                        </label>
                                        <input type="text" className="form-control mt-1" placeholder="Site URL" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </Modal.Body>

            </Modal>

        </div>
    );
}

export default AddNewCollegeForm;
