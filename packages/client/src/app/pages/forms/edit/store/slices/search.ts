import type { RootState } from '@editor/store';
import type { PayloadAction } from '@reduxjs/toolkit';
import { createSlice } from '@reduxjs/toolkit';

export enum Search {
  Fields = 'fields',
}

type SearchType = { [key in Search]: string };

const initialState: SearchType = {
  fields: '',
};

export const searchSlice = createSlice({
  name: 'search',
  initialState,
  reducers: {
    updateQuery: (
      state,
      action: PayloadAction<{ type: keyof SearchType; query: string }>
    ) => {
      state[action.payload.type] = action.payload.query;
    },
    clearQuery: (state, action: PayloadAction<keyof SearchType>) => {
      state[action.payload] = '';
    },
  },
});

export const { updateQuery, clearQuery } = searchSlice.actions;

export const selectQuery =
  (type: keyof SearchType) =>
  (state: RootState): string =>
    state.search[type];

export default searchSlice.reducer;