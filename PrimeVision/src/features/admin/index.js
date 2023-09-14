import React from "react";
import { db, getDbRef } from "../../config/fbConnect";
import { onValue } from "firebase/database";

const Admin = (props) => {
    const [list, setList] = React.useState({});
    const [selected, setSelected] = React.useState('');

    React.useEffect(()=> {
        const usersRef = getDbRef('users/');
        onValue(usersRef, (snapshot) => {
            const data = snapshot.val();
            setList(data);
        });
    }, []);

    const selectUser = (id)=> {
        return ()=> {
            setSelected(id);
        }
    }

    const loadUser = ()=> {
        const d = Object.keys(list)?.map((item)=> {
            return (
                <div key={item}>
                    <button onClick={selectUser(item)} >{item}</button>
                </div>
            )
        })
        return d;
    }

    const loadImg = ()=> {
        const d = list[selected]?.map((item, index)=> {
            return(
                <div key={index}>
                    <img src={item.imgUrl} />
                </div>
            )
        })
        return d;
    }

    return (
        <div>
            <div style={{display: 'flex', flexDirection: 'row', padding: '10px'}}>{loadUser()}</div>
            <div>
                {loadImg()}
            </div>
        </div>
    )
}

export default Admin;