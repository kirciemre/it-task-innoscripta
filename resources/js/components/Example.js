import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">ReactJS Component</div>

                        <div className="card-body">
                            <p>With 10.000 user and their profile data loading speeds as follows;</p>
                            <p>Bootstrap: 5.41 s</p>
                            <p>Datatable Default: 20.43 s</p>
                            <p>Datatable with Ajax: 0.75 s</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
