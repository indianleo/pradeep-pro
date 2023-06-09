import { SET_USER_DATA } from './actionTypes';

/**
 * Reducer for Auth user
 *
 * Description. Keep registration data in redux state
 * @author Abhishek.
 */

const initialState = {
  userData: {},
};

export default (state = initialState, action) => {
  switch (action.type) {
    case SET_USER_DATA:
      console.log('called')
      return {
        ...state,
        userData: action.payload,
      };
    default:
      return state;
  }
};
