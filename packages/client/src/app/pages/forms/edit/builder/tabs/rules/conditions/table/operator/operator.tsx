import React from 'react';
import type { Condition } from '@ff-client/types/rules';
import { Operator } from '@ff-client/types/rules';
import translate from '@ff-client/utils/translations';

type OperatorOptions = Partial<{ [key in Operator]: string }>;

const operatorOptions: OperatorOptions = {
  [Operator.Equals]: translate('is equal to'),
  [Operator.NotEquals]: translate('does not equal'),
  [Operator.GreaterThan]: translate('greater than'),
  [Operator.GreaterThanOrEquals]: translate('greater than or equal to'),
  [Operator.LessThan]: translate('less than'),
  [Operator.LessThanOrEquals]: translate('less than or equal to'),
  [Operator.Contains]: translate('contains'),
  [Operator.NotContains]: translate('does not contain'),
  [Operator.StartsWith]: translate('starts with'),
  [Operator.EndsWith]: translate('ends with'),
};

type Props = {
  condition: Condition;
  onChange?: (operator: Operator) => void;
};

export const OperatorSelect: React.FC<Props> = ({ condition, onChange }) => {
  const { operator } = condition;

  return (
    <div className="select fullwidth">
      <select
        value={operator}
        onChange={(event) =>
          onChange && onChange(event.target.value as Operator)
        }
      >
        {Object.entries(operatorOptions).map(([value, label]) => (
          <option key={value} value={value}>
            {label}
          </option>
        ))}
      </select>
    </div>
  );
};