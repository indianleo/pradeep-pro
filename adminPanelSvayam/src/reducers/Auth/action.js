import {SET_USER_DATA} from './actionTypes';

/**
 * Set User profile to redux
 *
 * Description. Save user profile to redux
 * @author Abhishek.
 */

export default function setUserdata(userData, access_token) {
  // const payload = userData;
  return (dispatch) => {
    returnToDispatch(dispatch, SET_USER_DATA, userData);
  };
}

export function returnToDispatch(dispatch, type, payload) {
  dispatch({
    type,
    payload,
  });
}